# The Twelve Factors
## I. Codebase
One codebase tracked in revision control, many deploys --> one codebase on GitHub, many deploys via docker and environment settings.
 
## II. Dependencies
Explicitly declare and isolate dependencies --> done separate docker containers.
 
## III. Config
Store config in the environment --> different environment config files located under `environments/`.
 
## IV. Backing services
Treat backing services as attached resources --> done separate docker containers.
 
## V. Build, release, run
Strictly separate build and run stages --> not correct implemented in that microservice. Normally the build process should be done in the CI/CD pipeline with a `gitlab-ci.yml` file.
 
## VI. Processes
Execute the app as one or more stateless processes --> can be done via `replicas` in the `docker-compose.yml` and using the nginx as load balancer. Note, you have to that with docker swarm in that case.
 
```
 carservice:
   deploy:
     replicas: 2
```
 
## VII. Port binding
Export services via port binding --> done using docker and separate services on separate ports.
 
## VIII. Concurrency
Scale out via the process model --> can also be done via `replicas` in the `docker-compose.yml` and using the nginx as load balancer. Note, you have to that with docker swarm in that case.
 
## IX. Disposability
Maximize robustness with fast startup and graceful shutdown  --> yes, docker-compose up & down
 
## X. Dev/prod parity
Keep development, staging, and production as similar as possible --> yes, the only differences are the env vars.
 
## XI. Logs
Treat logs as event streams --> not implemented yet
 
## XII. Admin processes
Run admin/management tasks as one-off processes  --> not implemented yet
 