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
-- Name: note; Type: TABLE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE TABLE note (
    id integer NOT NULL,
    userid integer NOT NULL,
    content text
);


ALTER TABLE note OWNER TO igtmprdlqnguiw;

--
-- Name: note_id_seq; Type: SEQUENCE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE SEQUENCE note_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE note_id_seq OWNER TO igtmprdlqnguiw;

--
-- Name: note_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: igtmprdlqnguiw
--

ALTER SEQUENCE note_id_seq OWNED BY note.id;


--
-- Name: note_user; Type: TABLE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE TABLE note_user (
    id integer NOT NULL,
    username character varying(255),
    password character varying(255)
);


ALTER TABLE note_user OWNER TO igtmprdlqnguiw;

--
-- Name: note_user_id_seq; Type: SEQUENCE; Schema: public; Owner: igtmprdlqnguiw
--

CREATE SEQUENCE note_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE note_user_id_seq OWNER TO igtmprdlqnguiw;

--
-- Name: note_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: igtmprdlqnguiw
--

ALTER SEQUENCE note_user_id_seq OWNED BY note_user.id;


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
-- Name: note id; Type: DEFAULT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY note ALTER COLUMN id SET DEFAULT nextval('note_id_seq'::regclass);


--
-- Name: note_user id; Type: DEFAULT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY note_user ALTER COLUMN id SET DEFAULT nextval('note_user_id_seq'::regclass);


--
-- Name: saved_posts id; Type: DEFAULT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY saved_posts ALTER COLUMN id SET DEFAULT nextval('saved_posts_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: note; Type: TABLE DATA; Schema: public; Owner: igtmprdlqnguiw
--

COPY note (id, userid, content) FROM stdin;
1	1	A note for John
2	1	Another note for John
3	2	And this is a note for Jane
\.


--
-- Name: note_id_seq; Type: SEQUENCE SET; Schema: public; Owner: igtmprdlqnguiw
--

SELECT pg_catalog.setval('note_id_seq', 3, true);


--
-- Data for Name: note_user; Type: TABLE DATA; Schema: public; Owner: igtmprdlqnguiw
--

COPY note_user (id, username, password) FROM stdin;
1	john	pass
2	jane	byui
\.


--
-- Name: note_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: igtmprdlqnguiw
--

SELECT pg_catalog.setval('note_user_id_seq', 2, true);


--
-- Data for Name: saved_posts; Type: TABLE DATA; Schema: public; Owner: igtmprdlqnguiw
--

COPY saved_posts (id, title, saved_date, subreddit, votes, link, user_id) FROM stdin;
13	I got a limited use recommend!	2017-05-30	latterdaysaints	57	/r/latterdaysaints/comments/6e0gob/i_got_a_limited_use_recommend/	1
14	What Did Josiah Reform? The Earlier Religion of Israel - Dr. Margaret Barker	2017-05-30	latterdaysaints	13	/r/latterdaysaints/comments/685gfm/what_did_josiah_reform_the_earlier_religion_of/	1
15	Should I pay tithing on unemployment?	2017-05-30	latterdaysaints	12	/r/latterdaysaints/comments/689y2x/should_i_pay_tithing_on_unemployment/	1
16	7 Articles for Indie Devs to Start Shipping	2017-05-30	webdev	2	/r/webdev/comments/5pcbdm/7_articles_for_indie_devs_to_start_shipping/	3
17	A Clean Responsive Menu Tutorial	2017-05-30	webdev	13	/r/webdev/comments/5p40bg/a_clean_responsive_menu_tutorial/	3
18	AMA with OJ	2017-05-30	ClashRoyale	850	/r/ClashRoyale/comments/5oe60a/ama_with_oj/	3
19	Understanding aggro and luring. Basic and advanced game mechanics.	2017-05-30	ClashRoyale	529	/r/ClashRoyale/comments/4bidq0/understanding_aggro_and_luring_basic_and_advanced/	3
20	How do you guys handle complex forms with validation and logic rules?	2017-05-30	reactjs	17	/r/reactjs/comments/5gamph/how_do_you_guys_handle_complex_forms_with/	3
\.


--
-- Name: saved_posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: igtmprdlqnguiw
--

SELECT pg_catalog.setval('saved_posts_id_seq', 20, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: igtmprdlqnguiw
--

COPY users (id, username, password) FROM stdin;
1	sbrenchley	suzanne
2	wkemmey	whit
3	gkemmey	test
4	test1	test
5	test2	test
6	test3	test
7	test4	test
8	test5	test
9	test6	test
10	test7	test
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: igtmprdlqnguiw
--

SELECT pg_catalog.setval('users_id_seq', 10, true);


--
-- Name: note note_pkey; Type: CONSTRAINT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY note
    ADD CONSTRAINT note_pkey PRIMARY KEY (id);


--
-- Name: note_user note_user_pkey; Type: CONSTRAINT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY note_user
    ADD CONSTRAINT note_user_pkey PRIMARY KEY (id);


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
-- Name: note note_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: igtmprdlqnguiw
--

ALTER TABLE ONLY note
    ADD CONSTRAINT note_userid_fkey FOREIGN KEY (userid) REFERENCES note_user(id);


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

