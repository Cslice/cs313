DROP DATABASE nba_predictor_app;

CREATE DATABASE nba_predictor_app;

USE nba_predictor_app;

CREATE TABLE user_group
(
id int PRIMARY KEY AUTO_INCREMENT,
group_name varchar(40) NOT NULL,
number_of_users int NOT NULL,
group_image_url varchar(500)
);

CREATE TABLE team
(
id tinyint PRIMARY KEY AUTO_INCREMENT,
name varchar(40) NOT NULL,
seed tinyint NOT NULL,
number_of_games_played tinyint NOT NULL,
eliminated boolean NOT NULL, 
nba_champion boolean,
team_image_url varchar(500)
);

CREATE TABLE user
(
id int PRIMARY KEY AUTO_INCREMENT,
last_name varchar(255) NOT NULL,
first_name varchar(255) NOT NULL,
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
group_id int NOT NULL,
number_of_points smallint NOT NULL,
user_image_url varchar(500),
favorite_team_in_playoffs_id tinyint,
admin boolean NOT NULL,
FOREIGN KEY (group_id) REFERENCES user_group(id),
FOREIGN KEY (favorite_team_in_playoffs_id) REFERENCES team(id)
);

CREATE TABLE playoff_bracket
(
id int PRIMARY KEY AUTO_INCREMENT,
conference varchar(20) NOT NULL,
round_number tinyint NOT NULL,
team_1 tinyint,
team_2 tinyint,
team_3 tinyint,
team_4 tinyint,
team_5 tinyint,
team_6 tinyint,
team_7 tinyint,
team_8 tinyint,
FOREIGN KEY (team_1) REFERENCES team(id),
FOREIGN KEY (team_2) REFERENCES team(id),
FOREIGN KEY (team_3) REFERENCES team(id),
FOREIGN KEY (team_4) REFERENCES team(id),
FOREIGN KEY (team_5) REFERENCES team(id),
FOREIGN KEY (team_6) REFERENCES team(id),
FOREIGN KEY (team_7) REFERENCES team(id),
FOREIGN KEY (team_8) REFERENCES team(id)
);

CREATE TABLE game
(
id int PRIMARY KEY AUTO_INCREMENT,
team1_id tinyint NOT NULL,
team2_id tinyint NOT NULL,
game_date date NOT NULL,
winner tinyint,
game_in_series tinyint NOT NULL,
round_number tinyint NOT NULL,
round_id tinyint NOT NULL,
FOREIGN KEY (team1_id) REFERENCES team(id),
FOREIGN KEY (team2_id) REFERENCES team(id),
FOREIGN KEY (winner) REFERENCES team(id)
);

CREATE TABLE user_prediction
(
id int PRIMARY KEY AUTO_INCREMENT,
user_id int NOT NULL,
game_id int NOT NULL,
prediction tinyint NOT NULL,
points_recieved_for_game boolean,
FOREIGN KEY (user_id) REFERENCES user(id),
FOREIGN KEY (game_id) REFERENCES game(id),
FOREIGN KEY (prediction) REFERENCES team(id)
);

source insertDatabaseData.sql














