#!/bin/bash

# Get the base directory name
base_dir=$(basename "$(pwd)")

# Construct the container name
container_name="${base_dir}-database-1"

# Execute the docker command
docker exec -i "$container_name" psql -U app -d app < populate.sql