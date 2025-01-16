FROM vercel/laravel-runtime:latest

RUN apt-get update && apt-get install -y libssl1.0.0 libssl-dev
