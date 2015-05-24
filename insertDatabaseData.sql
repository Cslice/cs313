
-- Insert Groups
INSERT INTO User_group 
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
INSERT INTO Team 
(
name                                    ,
number_of_games_played                  , 
eliminated
)
VALUES 
('Atlanta Hawks', 1, false)             ,
('Boston Celtics', 1, true)             ,
('Brooklyn Nets', 1, true)              ,
('Chicago Bulls', 1, true)              ,
('Cleveland Cavaliers', 1, false)       ,
('Dallas Mavericks', 1, true)           ,
('Golden State Warriors', 1, false)     ,
('Houston Rockets', 1, false)           ,
('Los Angeles Clippers', 1, true)       ,
('Memphis Grizzlies', 1, true)          ,
('Milwaukee Bucks', 1, true)            ,
('New Orleans Pelicans', 1, true)       ,
('Portland Trailblazers', 1, true)      ,
('San Antonio Spurs', 1, true)          ,
('Toronto Raptors', 1, true)            ,
('Washington Wizards', 1, true
);

-- Insert Users 
INSERT INTO User 
(
last_name                               ,  
first_name                              ,
username                                , 
password                                , 
group_id                                ,
number_of_points                        ,
user_image_url                          , 
favorite_team_in_playoffs_id            , 
admin
)								  
VALUES
(
'Cameron'								,
'Thomas'								, 
'cctski'								, 
'password'								, 
1										, 
1										, 
'image_url'								, 
6										, 
1
),
(
'Rusty'								    ,
'Denton'						   		, 
'rdenton'								, 
'password'								, 
1										, 
1										, 
'image_url'								, 
1										, 
0
),
(
'Matt'								    ,
'Nelson'						   		, 
'mnelson'								, 
'password'								, 
1										, 
1										, 
'image_url'								, 
7										, 
0
);

-- Insert Games

INSERT INTO game
(
team1_id,
team2_id,
favored_team,
game_date,
game_in_series,
round_number
)
VALUES
(
3 ,
4 ,
3 ,
'22-05-2015' ,
1 ,
3
);

-- Insert User Predictions

INSERT INTO user_prediction
(
user_id,
game_id,
prediction,
result
)
VALUES
(
1,
1,
2,
3
);


