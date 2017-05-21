--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: saved_posts; Type: TABLE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE TABLE saved_posts (
    id integer NOT NULL,
    title character varying(100) NOT NULL,
    saved_date date NOT NULL,
    subreddit character varying(100) NOT NULL,
    votes smallint NOT NULL,
    link character varying(200) NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE saved_posts OWNER TO igtmprdlqnguiw;

--
-- Name: saved_posts_id_seq; Type: SEQUENCE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE SEQUENCE saved_posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE saved_posts_id_seq OWNER TO igtmprdlqnguiw;

--
-- Name: saved_posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: igtmprdlqnguiw
--

ALTER SEQUENCE saved_posts_id_seq OWNED BY saved_posts.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(100) NOT NULL
);


ALTER TABLE users OWNER TO igtmprdlqnguiw;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO igtmprdlqnguiw;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: igtmprdlqnguiw
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: saved_posts id; Type: DEFAULT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY saved_posts ALTER COLUMN id SET DEFAULT nextval('saved_posts_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: saved_posts; Type: TABLE DATA; Schema: public; Owner: igtmprdlqnguiw
--

COPY saved_posts (id, title, saved_date, subreddit, votes, link, user_id) FROM stdin;
\.


--
-- Name: saved_posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: igtmprdlqnguiw
--

SELECT pg_catalog.setval('saved_posts_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: igtmprdlqnguiw
--

COPY users (id, username, password) FROM stdin;
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: igtmprdlqnguiw
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- Name: saved_posts saved_posts_pkey; Type: CONSTRAINT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY saved_posts
    ADD CONSTRAINT saved_posts_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: saved_posts saved_posts_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY saved_posts
    ADD CONSTRAINT saved_posts_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: igtmprdlqnguiw
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO igtmprdlqnguiw;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO igtmprdlqnguiw;


--
-- PostgreSQL database dump complete
--

