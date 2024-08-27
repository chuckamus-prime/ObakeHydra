FROM node:22-alpine

# Set the working directory
WORKDIR /usr/src/app

COPY package.json ./
RUN npm install
COPY src ./src
COPY static ./static
COPY svelte.config.js ./
COPY tsconfig.json ./
COPY vite.config.ts ./
RUN npm run build

# set this AFTER the build step
ENV PORT=5006
ENV NODE_ENV=production 
CMD ["node","build"]