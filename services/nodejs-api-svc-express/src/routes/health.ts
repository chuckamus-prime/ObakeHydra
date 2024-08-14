import { Router, Request, Response } from 'express';

const router = Router();

router.get('/', (req: Request, res: Response) => {
  console.log('Received request: '+req.method+' '+req.originalUrl);
  res.status(200).json({ 'Status': 'Healthy' });
});

export default router;
