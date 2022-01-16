CREATE DATABASE kgb CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

SELECT SCHEMA_NAME 'database', default_character_set_name 'charset', DEFAULT_COLLATION_NAME 'collation' FROM information_schema.SCHEMATA;

USE kgb;

CREATE USER 'kgb_admin'@'localhost' IDENTIFIED BY 'vladimirovitch'; 
-- deuxième prénom de Vladimir Poutine

GRANT SELECT, UPDATE, DELETE, INSERT ON kgb.* TO 'kgb_admin'@'localhost';

SHOW GRANTS FOR 'kgb_admin'@'localhost';


-- ADMIN

CREATE TABLE dt_admin(
    admin_id_uuid VARCHAR(36) NOT NULL UNIQUE PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    creation_date DATETIME
);

INSERT INTO dt_admin(admin_id_uuid, first_name, last_name, email, password, creation_date) VALUES 
    (UUID(), 'Leonid', 'Chebarchine', 'leonid.chebarchine@kgb-russia.ru', '$2y$10$ofWW7pM3L4f1HHQUR2mf/ucgoDUajfOd6NclueABiRE4Tlh6VIfQ.', NOW()),
    (UUID(), 'Viktor', 'Tchebrikov', 'v.tchebrikov@kgb-russia.ru', '$2y$10$DpkLHGSQwpZkZKB1dXtmEOgHNXM43GHx.ruuEQ0lWVgaUJXX6lQrS', NOW()),
    (UUID(), 'Vadim', 'Bakatine', 'bakatine@kgb-russia.ru', '$2y$10$YIpMRau0rXgEWStI18/PfujK0dN5Cypy8x9a0sN2o1sp8UN.W73sC', NOW()),
    (UUID(), 'Vladimir', 'Poutine', 'vlad.poutine@kgb-russia.ru', '$2y$10$ewRFJmDnHTOFn9wovAj9tOvndRtOdM5KdFprYUJydcmkT3X036pT.', NOW());

SELECT * FROM dt_admin;



-- LES TABLES SANS DEPENDANCES 


-- COUNTRIES

CREATE TABLE dt_countries(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(25) NOT NULL UNIQUE
);


-- SPECIALITES

CREATE TABLE dt_specialities(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL UNIQUE
);


-- MISSIONS TYPE

CREATE TABLE dt_mission_type(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL UNIQUE
);


-- MISSIONS STATUT

CREATE TABLE dt_mission_statut(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL UNIQUE
);


-- STAKEOUT TYPE

CREATE TABLE dt_stakeout_type(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL UNIQUE
);

-----------------------------------------------------------------

-- STAKEOUT

CREATE TABLE dt_stakeout(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(45) NOT NULL UNIQUE,
    adress VARCHAR(100) NOT NULL,
    id_country INT(3) NOT NULL,
    id_type INT(2) NOT NULL,
    FOREIGN KEY (id_country) REFERENCES dt_countries(id),
    FOREIGN KEY (id_type) REFERENCES dt_stakeout_type(id)
);


------------------------------------------------------------------


-- MISSIONS

CREATE TABLE dt_missions(
    mission_id_uuid VARCHAR(36) NOT NULL UNIQUE PRIMARY KEY,
    title VARCHAR(60) NOT NULL,
    description TEXT,
    code_name VARCHAR(20) NOT NULL UNIQUE,
    start DATE,
    end DATE,
    id_type INT(2) NOT NULL,
    id_country INT(3) NOT NULL,
    id_statut INT(2) NOT NULL,
    id_speciality INT(3) NOT NULL)
;

ALTER TABLE dt_missions
   ADD CONSTRAINT id_type FOREIGN KEY (id_type)
      REFERENCES dt_mission_type(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;
ALTER TABLE dt_missions
   ADD CONSTRAINT id_country FOREIGN KEY (id_country)
      REFERENCES dt_countries(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;
ALTER TABLE dt_missions
   ADD CONSTRAINT id_statut FOREIGN KEY (id_statut)
      REFERENCES dt_mission_statut(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;
ALTER TABLE dt_missions
   ADD CONSTRAINT id_speciality FOREIGN KEY (id_speciality)
      REFERENCES dt_specialities(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;


----------------------------------------------------------------------

-- PEOPLE

--agents https://fr.namefake.com/

CREATE TABLE dt_agents(
    agent_id_uuid VARCHAR(36) NOT NULL UNIQUE PRIMARY KEY,
    identification_code INT(7) NOT NULL UNIQUE, -- 7 Comme la gendarmerie
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(45) NOT NULL,
    birth_date DATE,
    id_country INT(3) NOT NULL,
    FOREIGN KEY (id_country) REFERENCES dt_countries(id)
);



--agents_has_specialities

CREATE TABLE dt_agents_specialities(
    id_agent VARCHAR(36) NOT NULL,
    id_speciality INT(3) NOT NULL,
    FOREIGN KEY (id_agent) REFERENCES dt_agents(agent_id_uuid) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_speciality) REFERENCES dt_specialities(id) ON DELETE CASCADE ON UPDATE CASCADE
);


-------------

--cibles

CREATE TABLE dt_target(
    target_id_uuid VARCHAR(36) NOT NULL UNIQUE PRIMARY KEY,
    code_name VARCHAR(20) UNIQUE,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(45) NOT NULL,
    birth_date DATE,
    id_country INT(3) NOT NULL,
    FOREIGN KEY (id_country) REFERENCES dt_countries(id)
);



-------------

--contacts

CREATE TABLE dt_contacts(
    contact_id_uuid VARCHAR(36) NOT NULL UNIQUE PRIMARY KEY,
    code_name VARCHAR(20) UNIQUE,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(45) NOT NULL,
    birth_date DATE,
    id_country INT(3) NOT NULL,
    FOREIGN KEY (id_country) REFERENCES dt_countries(id)
);



-----------------------------------------------------------

-- missions has stakeout

CREATE TABLE dt_mission_stakeout(
    id_mission VARCHAR(36) NOT NULL,
    id_stakeout INT(5) NOT NULL
);

ALTER TABLE dt_mission_stakeout
   ADD CONSTRAINT id_mission_dt_mission_stakeout FOREIGN KEY (id_mission)
      REFERENCES dt_missions(mission_id_uuid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;
ALTER TABLE dt_mission_stakeout
   ADD CONSTRAINT id_stakeout_dt_mission_stakeout FOREIGN KEY (id_stakeout)
      REFERENCES dt_stakeout(id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;



--agents_has_missions

CREATE TABLE dt_agents_missions(
    id_agent VARCHAR(36) NOT NULL,
    id_mission VARCHAR(36) NOT NULL
);

ALTER TABLE dt_agents_missions
   ADD CONSTRAINT id_mission_dt_agents_missions FOREIGN KEY (id_mission)
      REFERENCES dt_missions(mission_id_uuid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;
ALTER TABLE dt_agents_missions
   ADD CONSTRAINT id_agent_dt_agents_missions FOREIGN KEY (id_agent)
      REFERENCES dt_agents(agent_id_uuid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;



--cibles_has_missions

CREATE TABLE dt_targets_missions(
    id_target VARCHAR(36) NOT NULL,
    id_mission VARCHAR(36) NOT NULL
);

ALTER TABLE dt_targets_missions
   ADD CONSTRAINT id_mission_dt_targets_missions FOREIGN KEY (id_mission)
      REFERENCES dt_missions(mission_id_uuid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;

ALTER TABLE dt_targets_missions
   ADD CONSTRAINT id_target_dt_targets_missions FOREIGN KEY (id_target)
      REFERENCES dt_target(target_id_uuid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;


--contacts_has_missions

CREATE TABLE dt_contacts_missions(
    id_contact VARCHAR(36) NOT NULL,
    id_mission VARCHAR(36) NOT NULL
);

ALTER TABLE dt_contacts_missions
   ADD CONSTRAINT id_mission_dt_contacts_missions FOREIGN KEY (id_mission)
      REFERENCES dt_missions(mission_id_uuid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;

ALTER TABLE dt_contacts_missions
   ADD CONSTRAINT id_contact_dt_contacts_missions FOREIGN KEY (id_contact)
      REFERENCES dt_contacts(contact_id_uuid)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;
