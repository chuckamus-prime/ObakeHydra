import {CommunicationProtocolEnum, DaprClient} from "@dapr/dapr";
import {DaprClientOptions} from "@dapr/dapr/types/DaprClientOptions";

const daprHost = process.env.DAPR_HOST ?? "localhost";

function  CreateDaprHttpClient() {
    const daprHttpPort = process.env.DAPR_HTTP_PORT ?? "50002";
    let options:DaprClientOptions = {
        daprHost: daprHost,
        daprPort: daprHttpPort,
        communicationProtocol: CommunicationProtocolEnum.HTTP
    }
    return new DaprClient(options);
}

function CreateDaprGrpcClient() {
    const darGrpcPort = process.env.DAPR_GRPC_PORT ?? "50001";
    let options:DaprClientOptions = {
        daprHost: daprHost,
        daprPort: darGrpcPort,
        communicationProtocol: CommunicationProtocolEnum.GRPC
    }
   return new DaprClient(options);
}


export { CreateDaprHttpClient, CreateDaprGrpcClient };