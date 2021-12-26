#!/bin/bash

#Fonction permettant la création d'un conteneur sous WPF

  mkdir $1
   
  echo "apiVersion: apps/v1
kind: Deployment
metadata:
  name: helios-site-deployment
  labels:
    app: helios-site
spec:
  replicas: 1
  selector:
    matchLabels:
      app: helios-site
  
  template:
    metadata:
      labels:
        app: helios-site
    spec:
      containers:
      - name: helios-site
        image: pencloudregistry.azurecr.io/python:latest
        imagePullPolicy: Always
        env:
        - name: SITE
          value: '$1'
        - name: EMAIL
          value: '$2'
        command: ['/bin/sh']
        args: ['-c', 'while true; do cd /home/dev; ./automate.sh $(SITE);done']
        ports:
        - name: http
          containerPort: 80" > /$1/test-deployment.yaml
  sudo /usr/bin/kubectl apply -f /$1/test-deployment.yaml
