import { Router, Request, Response } from 'express';
import {CreateDaprGrpcClient, CreateDaprHttpClient}  from '../utils/dapr';
const router = Router();

router.get('/', async (req: Request, res: Response) => {
  console.log('Received request: '+req.method+' '+req.originalUrl);

  const status = { 'Status': 'Healthy' };
  let daprSuccess: boolean = await demoDaprPublishEvent(status);
  if (!daprSuccess) {
    res.status(500).json({ 'Status': 'Error' });
    return;
  }
  res.status(200).json(status);
});

async function demoDaprPublishEvent(status:any) : Promise<boolean> {
  let daprClient = CreateDaprGrpcClient();
  const pubSubName = process.env.PUBSUB_NAME ?? "pubsub";
  const topicName = process.env.HEALTHCHECK_TOPIC_NAME ?? "healthcheck";
  try {
    let res = await daprClient.pubsub.publish(pubSubName, topicName, status);
    if (res.error){
      console.error(`Error publishing message: ${res.error}`);
    }
    else{
      console.log("Published message to topic: %s", topicName);
    }
  }
  catch (error) {
    console.error(`Error publishing message: ${error}`);
    return false;
  }

  return true
}


export default router;
