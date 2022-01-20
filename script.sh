#!/bin/bash

sudo /usr/bin/docker context use attack
sudo /usr/bin/docker run -e link=$1 -e email=$2 pencloud.azurecr.io/python:latest
