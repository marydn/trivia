## Environment setup using Docker

### Environment configuration

1. Clone this project: `$ git clone https://github.com/marydn/trivia`

2. Move to the project folder: `$ cd trivia`

### Application execution

1. [Install Docker](https://www.docker.com/get-started)

2. Start the project: `$ make build`
   
    This will install PHP dependencies and bring up the project Docker containers with Docker Compose.

3. Check everything's up: `$ docker-composer ps`

    It should show nginx and php services up.

4. Go to `http:://localhost:8000` in your browser

### Some Docker commands

- Bringing up the project using Docker: `$ make`
- Bringing down the project: `$ make destroy`
- Rebuild Docker images forcing latest versions and ignoring cache: `$ make rebuild`

## Project explanation

This is a simple project to implement DDD