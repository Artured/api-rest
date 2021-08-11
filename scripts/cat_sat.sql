--
-- PostgreSQL database dump
--

-- Dumped from database version 10.17 (Ubuntu 10.17-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.17 (Ubuntu 10.17-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: catalogo_satelites; Type: TABLE; Schema: public; Owner: 
--

CREATE TABLE public.catalogo_satelites (
    id integer NOT NULL,
    name character varying,
    cor_x double precision,
    cor_y double precision,
    distance double precision,
    message character varying
);


ALTER TABLE public.catalogo_satelites OWNER TO ;

--
-- Name: catalogo_satelites_id_seq; Type: SEQUENCE; Schema: public; Owner: 
--

CREATE SEQUENCE public.catalogo_satelites_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.catalogo_satelites_id_seq OWNER TO ;

--
-- Name: catalogo_satelites_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: 
--

ALTER SEQUENCE public.catalogo_satelites_id_seq OWNED BY public.catalogo_satelites.id;


--
-- Name: catalogo_satelites id; Type: DEFAULT; Schema: public; Owner: 
--

ALTER TABLE ONLY public.catalogo_satelites ALTER COLUMN id SET DEFAULT nextval('public.catalogo_satelites_id_seq'::regclass);


--
-- Data for Name: catalogo_satelites; Type: TABLE DATA; Schema: public; Owner: 
--

INSERT INTO public.catalogo_satelites VALUES (2, 'Skywalker', 100, -100, 115.5, '["este","","un","mensaje"]');
INSERT INTO public.catalogo_satelites VALUES (1, 'Kenobi', -500, -200, 100, '["","este","es","un","mensaje"]');
INSERT INTO public.catalogo_satelites VALUES (3, 'Sato', 500, 100, 142.699999999999989, '["","","es","","mensaje"]');


--
-- Name: catalogo_satelites_id_seq; Type: SEQUENCE SET; Schema: public; Owner: 
--

SELECT pg_catalog.setval('public.catalogo_satelites_id_seq', 3, true);


--
-- Name: catalogo_satelites catalogo_satelites_pkey; Type: CONSTRAINT; Schema: public; Owner: 
--

ALTER TABLE ONLY public.catalogo_satelites
    ADD CONSTRAINT catalogo_satelites_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

