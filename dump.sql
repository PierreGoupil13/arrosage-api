--
-- PostgreSQL database dump
--

-- Dumped from database version 14.8
-- Dumped by pg_dump version 14.8

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

--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: app
--

INSERT INTO public.utilisateur (id, nom, prenom, email, mdp, role, pseudo) VALUES (1, 'Goupil', 'Pierre', 'p.goupil356@gmail.com', 'azerty', 'gardien', 'pgoupil');
INSERT INTO public.utilisateur (id, nom, prenom, email, mdp, role, pseudo) VALUES (2, 'Prime', 'Tony', 'tonyprime2012@gmail.com
', 'azerty', 'gardien', 'tprime');
INSERT INTO public.utilisateur (id, nom, prenom, email, mdp, role, pseudo) VALUES (3, 'Beucher', 'Lucile', 'l.beucher@gmail.com', 'azerty', 'proprietaire', 'lbeucher');
INSERT INTO public.utilisateur (id, nom, prenom, email, mdp, role, pseudo) VALUES (4, 'Leroy', 'Mathias', 'm.leroy@gmail.com', 'azerty', 'proprietaire', 'mleroy');


--
-- Data for Name: annonce; Type: TABLE DATA; Schema: public; Owner: app
--

INSERT INTO public.annonce (id, etat, titre, description, numero, ville, rue, code_postal, utilisateur_prop_id) VALUES (1, 'active', 'Annonce pour ma rose', 'Je voudrais que l''on s''occupe de ma rose pendant mes vacances de 2 semaines', 1, 'Nantes', 'Rue du calvaire', '44200', 2);
INSERT INTO public.annonce (id, etat, titre, description, numero, ville, rue, code_postal, utilisateur_prop_id) VALUES (2, 'active', 'Annonce pour ma rose', 'Je voudrais que l''on s''occupe de mon orchidées pendant mes vacances de 2 semaines', 3, 'Nantes', 'Impasse de gaule', '44200', 1);
INSERT INTO public.annonce (id, etat, titre, description, numero, ville, rue, code_postal, utilisateur_prop_id) VALUES (3, 'active', 'Annonce pour ma rose blanche', 'Je voudrais que l''on s''occupe de mon orchidées pendant mes vacances de 2 semaines', 124, 'Nantes', 'Rue du 13 mai', '44200', 2);
INSERT INTO public.annonce (id, etat, titre, description, numero, ville, rue, code_postal, utilisateur_prop_id) VALUES (4, 'active', 'Mon Orchidée', 'Je voudrais que l''on s''occupe de mon orchidées pendant mes vacances de 2 semaines', 14, 'Nantes', 'Rue du schaffer', '44200', 3);
INSERT INTO public.annonce (id, etat, titre, description, numero, ville, rue, code_postal, utilisateur_prop_id) VALUES (5, 'active', 'Mon Aloe Vera', 'Je voudrais que l''on s''occupe de mon orchidées pendant mes vacances de 2 semaines', 21, 'Nantes', 'Boulevard de la gare', '44200', 4);


--
-- Data for Name: plante; Type: TABLE DATA; Schema: public; Owner: app
--

INSERT INTO public.plante (id, nom, type, dimension, exposition, arrosage, famille, description) VALUES (1, 'Rose Rouge', 'Fleur', '15cm', '2 h', '100 ml', 'Roses', 'De magnifiques rose rouges de hollande');
INSERT INTO public.plante (id, nom, type, dimension, exposition, arrosage, famille, description) VALUES (2, 'Rose Blanche', 'Fleur', '10cm', '2 h', '100 ml', 'Roses', 'De magnifiques rose blanches de hollande');
INSERT INTO public.plante (id, nom, type, dimension, exposition, arrosage, famille, description) VALUES (3, 'Aloe Vera', 'Plante Grasse', '15cm', '12 h ', '10 ml', 'Herbaces', 'De l''aloe vera pour crée des pomades');
INSERT INTO public.plante (id, nom, type, dimension, exposition, arrosage, famille, description) VALUES (4, 'Camelia', 'Fleur', '30 cm', '4 h', '300 ml', 'Camelia', 'De magnifiques camelia du Perou');
INSERT INTO public.plante (id, nom, type, dimension, exposition, arrosage, famille, description) VALUES (5, 'Orchidées', 'Fleur', '15cm', '5 h ', '200 ml', 'Orchidées', 'De magnifiques Orchidées de hollande');


--
-- Data for Name: annonce_plante; Type: TABLE DATA; Schema: public; Owner: app
--

INSERT INTO public.annonce_plante (annonce_id, plante_id) VALUES (1, 1);
INSERT INTO public.annonce_plante (annonce_id, plante_id) VALUES (2, 5);
INSERT INTO public.annonce_plante (annonce_id, plante_id) VALUES (2, 4);
INSERT INTO public.annonce_plante (annonce_id, plante_id) VALUES (4, 5);
INSERT INTO public.annonce_plante (annonce_id, plante_id) VALUES (5, 5);
INSERT INTO public.annonce_plante (annonce_id, plante_id) VALUES (3, 3);


--
-- Data for Name: annonce_utilisateur; Type: TABLE DATA; Schema: public; Owner: app
--

INSERT INTO public.annonce_utilisateur (annonce_id, utilisateur_id) VALUES (1, 1);
INSERT INTO public.annonce_utilisateur (annonce_id, utilisateur_id) VALUES (1, 3);
INSERT INTO public.annonce_utilisateur (annonce_id, utilisateur_id) VALUES (1, 4);
INSERT INTO public.annonce_utilisateur (annonce_id, utilisateur_id) VALUES (2, 2);


--
-- Data for Name: commentaire; Type: TABLE DATA; Schema: public; Owner: app
--

INSERT INTO public.commentaire (id, annonce_id, utilisateur_id, message) VALUES (1, 1, 1, 'Je serais disponible pour garder votre fleur');
INSERT INTO public.commentaire (id, annonce_id, utilisateur_id, message) VALUES (2, 1, 3, 'Je suis aussi disponible, je voudrais savoir les dates de vos vacances');
INSERT INTO public.commentaire (id, annonce_id, utilisateur_id, message) VALUES (4, 1, 1, 'Je voudrais savoir les dates aussi');
INSERT INTO public.commentaire (id, annonce_id, utilisateur_id, message) VALUES (3, 2, 3, 'Oui je pourrais la garder');


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: app
--

INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20210930074739', '2023-07-11 13:53:36', 9);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620085652', '2023-07-11 13:53:36', 4);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620085957', '2023-07-11 13:53:36', 3);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620090057', '2023-07-11 13:53:36', 6);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620090701', '2023-07-11 13:53:36', 3);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620090910', '2023-07-11 13:53:36', 2);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620090933', '2023-07-11 13:53:36', 1);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620091355', '2023-07-11 13:53:36', 5);
INSERT INTO public.doctrine_migration_versions (version, executed_at, execution_time) VALUES ('DoctrineMigrations\Version20230620091850', '2023-07-11 13:53:36', 5);


--
-- Name: annonce_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.annonce_id_seq', 1, false);


--
-- Name: commentaire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.commentaire_id_seq', 3, true);


--
-- Name: plante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.plante_id_seq', 1, false);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.utilisateur_id_seq', 1, false);


--
-- PostgreSQL database dump complete
--

