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
-- Name: catalogo_planetas; Type: TABLE; Schema: public; Owner: 
--

CREATE TABLE public.catalogo_planetas (
    id integer NOT NULL,
    nombre character varying,
    gravedad double precision,
    imagen character varying
);


ALTER TABLE public.catalogo_planetas OWNER TO ;

--
-- Name: catalogo_planetas_id_seq; Type: SEQUENCE; Schema: public; Owner: 
--

CREATE SEQUENCE public.catalogo_planetas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.catalogo_planetas_id_seq OWNER TO ;

--
-- Name: catalogo_planetas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: 
--

ALTER SEQUENCE public.catalogo_planetas_id_seq OWNED BY public.catalogo_planetas.id;


--
-- Name: catalogo_planetas id; Type: DEFAULT; Schema: public; Owner: 
--

ALTER TABLE ONLY public.catalogo_planetas ALTER COLUMN id SET DEFAULT nextval('public.catalogo_planetas_id_seq'::regclass);


--
-- Data for Name: catalogo_planetas; Type: TABLE DATA; Schema: public; Owner: 
--

INSERT INTO public.catalogo_planetas VALUES (2, 'Marte', 3.72100000000000009, NULL);
INSERT INTO public.catalogo_planetas VALUES (3, 'Venus', 8.86999999999999922, NULL);
INSERT INTO public.catalogo_planetas VALUES (4, 'Mercurio', 3.70000000000000018, NULL);
INSERT INTO public.catalogo_planetas VALUES (5, 'Jupiter', 24.7899999999999991, NULL);
INSERT INTO public.catalogo_planetas VALUES (6, 'Saturno', 10.4399999999999995, NULL);
INSERT INTO public.catalogo_planetas VALUES (1, 'Tierra', 9.80000000000000071, 'http://localhost/API/img/1.webp');


--
-- Name: catalogo_planetas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: 
--

SELECT pg_catalog.setval('public.catalogo_planetas_id_seq', 6, true);


--
-- Name: catalogo_planetas catalogo_planetas_pkey; Type: CONSTRAINT; Schema: public; Owner: 
--

ALTER TABLE ONLY public.catalogo_planetas
    ADD CONSTRAINT catalogo_planetas_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--
