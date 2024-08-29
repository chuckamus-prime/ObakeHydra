# Redis-Stack

This is a simple demonstration of running redis stack, which includes the redis insight tool for visualizing the data in redis.

This doesn't do anything special with redis, like setting environment variables or config settings. There are more things that can be done for working with the redis setup.

Go checkout the docs <https://redis.io/docs/latest/> if you want to know more.

## components

### redis server

This is the redis server that stores the data. It is what you would connect to to user redis for caching, redis streams, etc.
We are mapping the port 6379 (the default redis port) to 5010 to avoid conflicts with any other docker-compose service.

### redis insight

This is a web app that lets you visualize the data in redis. It is a great tool for debugging and understanding what is in your redis server's data.
We are mapping the port 8001 to 5011.

You can view the redis insight at <http://localhost:5011>