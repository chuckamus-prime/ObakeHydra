import express from 'express';
import healthRouter from './routes/health';
import { CreateDaprGrpcClient, CreateDaprServer } from './utils/dapr';
import { Logger } from '@dapr/dapr/logger/Logger';

console.log("service starting...");
const app = express();
const port = process.env.HTTP_PORT ?? 5002;

// define the routes and the routers
app.use('/api/health', healthRouter);

app.listen(port, () => {
  console.log(`Express server is running on port ${port}`);
});
const pubsubName = "pubsub";//"pmtool-pubsub-project-attribute-changed"
const topicName = "project.attribute.changed";
const publishTurnedOn = true;
let daprServer = CreateDaprServer();
let daprClient = CreateDaprGrpcClient();
daprServer.pubsub.subscribe(pubsubName, topicName, async (data) => {
    console.debug(`Received event from Dapr: ${data}`);
}).then(() => {
    console.log(`Subscribed to ${topicName} topic`);
    return daprServer.start();
}).then(() => {
    console.log(`Dapr server started`);
    //now try to publish some events in a loop
    if (publishTurnedOn){
    setInterval(async () => {
      //generate a dummy id
      let id = Math.floor(Math.random() * 1000000);
        const eventData = {
            Id: id.toString(),
            attributeName: "status",
            newValue: "active",
            timeStamp: new Date().toISOString()
        };
        try {
            const daprResponse = await daprClient.pubsub.publish(pubsubName, topicName, eventData);
            if (daprResponse.error) {
                  throw new Error(`Dapr publish error: ${daprResponse.error}`);
            }
            console.info(`Publishing event to Dapr: ${eventData.attributeName} for id ${eventData.Id}`);
        } 
        catch (error) {
            console.error("Error publishing event:", error);
        }
    }, 1000);
  }
}).catch((error) => {
    console.error("Error subscribing to topic:", error);
});
