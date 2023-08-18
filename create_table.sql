## First create database
  CREATE DATABASE contact_form_db
 ## use databade 
  use contact_form_db
 ## create table  
  CREATE TABLE contact_form
(
  id serial NOT NULL,
  full_name character varying(100) NOT NULL,
  phone character varying(20) NOT NULL,
  email character varying(100) NOT NULL,
  subject character varying(100) NOT NULL,
  message text NOT NULL,
  ip_address character varying(45) NOT NULL,
  "timestamp" timestamp without time zone DEFAULT now(),
  CONSTRAINT contact_form_pkey PRIMARY KEY (id)
)
