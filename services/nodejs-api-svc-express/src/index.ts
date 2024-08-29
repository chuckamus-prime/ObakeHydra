import express from 'express';
import healthRouter from './routes/health';

console.log("service starting...");
const app = express();
const port = process.env.HTTP_PORT ?? 5002;

// define the routes and the routers
app.use('/api/health', healthRouter);

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
