# component definitions

this folder is where you would place sub-folders for each environment you want to deploy to. In each environment folder, you would place the component definitions for that environment. In lower environments, you might have a different configuration to use connect to than in upper environments.

For instance, in localdev, i may use an [in-memory](https://docs.dapr.io/reference/components-reference/supported-pubsub/setup-inmemory/) pub-sub component, but in upper environments, i may use a more robust service to handle pubsub like [Apache Kafka](https://docs.dapr.io/reference/components-reference/supported-pubsub/setup-apache-kafka/)

Learn more about dapr component specs [here](https://docs.dapr.io/reference/components-reference/)