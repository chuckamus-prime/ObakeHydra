# Use the official Node.js image as the base image
FROM node:22-alpine

# Set the working directory
WORKDIR /usr/src/app

# Copy package.json and package-lock.json
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy the rest of the application code
COPY src ./src

# Copy the TypeScript configuration
COPY tsconfig.json ./

# Build the TypeScript code
RUN npm run build

# Start the application
CMD ["npm", "start"]
