# Tertius

Tertius is a delivery mechanism for php 5.4. It's an experiment, so don't use it.

## Mongrel2

The main development on Tertius is aimed at the Mongrel2 server.

## Goals

Tertius should be:

 - Slim
 - Fast
 - Easy to read
 - Simple to deliver an application with

It will not:

 - Have "normal" framework stuff like:
  - ORM
  - Database access
  - Models

## MVC In Tertius

Tertius doesn't specifically adhear to the MVC design pattern. It has controller-ish things, and view models, but no "model" layer.

The "model" layer should be provided by your business logic, which lives outside of your delivery mechanism and is called by Tertius.
