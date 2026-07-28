import {CommunicationProtocolEnum, DaprClient, DaprServer} from "@dapr/dapr";
import {DaprClientOptions} from "@dapr/dapr/types/DaprClientOptions";

const daprHost = process.env.DAPR_HOST ?? "localhost";
const daprHttpPort = process.env.DAPR_HTTP_PORT ?? "50002";
const darGrpcPort = process.env.DAPR_GRPC_PORT ?? "50001";
const serverPort = process.env.DAPR_SERVER_PORT ?? "6000";

function  CreateDaprHttpClient() {    
    console.debug(`Creating Dapr HTTP client with host: ${daprHost}, port: ${daprHttpPort}`);
    let options:DaprClientOptions = {
        daprHost: daprHost,
        daprPort: daprHttpPort,
        communicationProtocol: CommunicationProtocolEnum.HTTP
    }
    return new DaprClient(options);
}

function CreateDaprGrpcClient() {
    let options:DaprClientOptions = {
        daprHost: daprHost,
        daprPort: darGrpcPort,
        communicationProtocol: CommunicationProtocolEnum.GRPC
    }
   return new DaprClient(options);
}

function CreateDaprServer(){
    console.debug(`Creating Dapr server with host: ${daprHost}, port: ${serverPort}`);
    let daprServer = new DaprServer({
      serverHost: daprHost,
      serverPort,
      communicationProtocol: CommunicationProtocolEnum.HTTP,
      clientOptions: {
        daprHost,
        daprPort: daprHttpPort,
      },
    });
    return daprServer;
}


export { CreateDaprHttpClient, CreateDaprGrpcClient, CreateDaprServer };