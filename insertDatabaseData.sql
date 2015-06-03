

-- Insert Groups
INSERT INTO user_group 
(
group_name                              , 
number_of_users
) 
VALUES 
(
'Test Group'                            , 
1
),
(
'Test Group2'                            , 
4
);


-- Insert NBA Teams
INSERT INTO team 
(
name                                    ,
number_of_games_played                  , 
seed   									,
eliminated
)
VALUES 
('Atlanta Hawks', 1, 1, false)             ,
('Boston Celtics', 7, 1, true)             ,
('Brooklyn Nets', 8, 1, true)              ,
('Chicago Bulls', 3, 1, true)              ,
('Cleveland Cavaliers', 3, 1, false)       ,
('Dallas Mavericks', 7, 1, true)           ,
('Golden State Warriors', 1, 1, false)     ,
('Houston Rockets', 2, 1, false)           ,
('Los Angeles Clippers', 3, 1, true)       ,
('Memphis Grizzlies', 5, 1, true)          ,
('Milwaukee Bucks', 6, 1, true)            ,
('New Orleans Pelicans', 8, 1, true)       ,
('Portland Trailblazers', 4, 1, true)      ,
('San Antonio Spurs', 6, 1, true)          ,
('Toronto Raptors', 4, 1, true)            ,
('Washington Wizards', 5, 1, true
);

-- Insert Users 
INSERT INTO user 
(
first_name                               ,  
last_name                              ,
username                                , 
password                                , 
group_id                                ,
number_of_points                        , 
admin
)								  
VALUES
(
'Cameron'								,
'Thomas'								, 
'a'								, 
'a'								, 
2										, 
0										, 
1
),
(
'Rusty'								    ,
'Denton'						   		, 
'rdenton'								, 
'password'								, 
2										, 
0										, 
0
),
(
'Matt'								    ,
'Nelson'						   		, 
'mnelson'								, 
'password'								, 
2										, 
0										, 
0
);

-- Insert Rounds

-- First Round 
INSERT INTO playoff_bracket
(
conference,
round_number,
team_1,
team_2,
team_3,
team_4,
team_5,
team_6,
team_7,
team_8
)
VALUES
(
"West",
1,
7,
12,
13,
10,
9,
14,
8,
6
),
(
"Eeat",
1,
1,
3,
15,
16,
4,
11,
5,
2
);

-- Second Round
INSERT INTO playoff_bracket
(
conference,
round_number,
team_1,
team_2,
team_3,
team_4
)
VALUES
(
"West",
2,
7,
10,
9,
8
),
(
"Eest",
2,
1,
16,
4,
5
);

-- Conference Final - Third Round
INSERT INTO playoff_bracket
(
conference,
round_number,
team_1,
team_2
)
VALUES
(
"West",
3,
7,
8
),
(
"Eeat",
3,
1,
5
);

-- NBA Finals - Forth Round
INSERT INTO playoff_bracket
(
conference,
round_number,
team_1,
team_2
)
VALUES
(
"Both",
4,
7,
5
);




-- Insert Games
/*
INSERT INTO game
(
team1_id,
team2_id,
game_date,
game_in_series,
round_number,
round_id,
winner
)
VALUES
(
3 ,
4 ,
'2015-2-05' ,
1 ,
3,
2,
3
),
(
6 ,
8 ,
'2015-2-05' ,
1 ,
3,
2,
8
),
(
6 ,
8 ,
'2015-2-05' ,
1 ,
3,
2,
8
),
(
6 ,
8 ,
'2015-2-05' ,
1 ,
3,
2,
8
);*/

INSERT INTO game
(
team1_id,
team2_id,
game_date,
game_in_series,
round_number,
round_id
)
VALUES
(
3 ,
4 ,
'2015-2-05' ,
1 ,
3,
2
);

-- Insert User Predictions

INSERT INTO user_prediction
(
user_id,
game_id,
prediction, 
points_recieved_for_game
)
VALUES
(
1,
1,
NULL,
0
);

-- -- Insert User Predictions

-- INSERT INTO user_prediction
-- (
-- user_id,
-- game_id,
-- prediction, 
-- points_recieved_for_game
-- )
-- VALUES
-- (
-- 1,
-- 1,
-- 2,
-- 0
-- ),
-- (
-- 1,
-- 2,
-- 9,
-- 0
-- ),
-- (
-- 2,
-- 1,
-- 4,
-- 0
-- ),
-- (
-- 1,
-- 3,
-- 4,
-- 0
-- );


