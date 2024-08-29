# syntax=docker/dockerfile:1
FROM mcr.microsoft.com/dotnet/sdk:8.0-jammy AS build

#ARG TARGETARCH
WORKDIR /source

# Copy sln and restore as distinct layers
COPY *.sln .
COPY Tests/*.csproj ./Tests/
COPY App/*.csproj ./App/
#RUN dotnet restore -a $TARGETARCH
RUN dotnet restore
# Copy everything else and build
COPY Tests/. ./Tests/
COPY App/. ./App/
RUN dotnet test

WORKDIR /source/App
#RUN dotnet publish -a $TARGETARCH -c release -o ./publish --no-restore
RUN dotnet publish -c release -o ./publish --no-restore

# Build runtime image
FROM mcr.microsoft.com/dotnet/aspnet:8.0-jammy
WORKDIR /app
COPY --from=build ./source/App/publish .

# Disable the invariant mode (set in base image)
ENV DOTNET_SYSTEM_GLOBALIZATION_INVARIANT=1

# Environment variables, can be overridden


# "Exec" form - Works without a shell
RUN ["dotnet", "--list-runtimes"]
ENTRYPOINT ["dotnet", "dotnet-svc.dll"]
CMD ["dotnet", "dotnet-svc.dll", "--", "args"]