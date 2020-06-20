CREATE DATABASE IF NOT EXISTS laravel_master;
use laravel_master;

CREATE TABLE IF NOT EXISTS users(
id              int(255)     not null auto_increment,
role            varchar(20)  not null,
name            varchar(75)  not null,
surname         varchar(150) not null,
nick            varchar(50)  not null,
email           varchar(200) not null,
password        varchar(150) not null,
image           varchar(200),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS posts(
id           int(255)     not null auto_increment,
user_id      int(255)     not null,
image_path   varchar(200),
content      text         not null,
created_at   datetime,
updated_at   datetime,
CONSTRAINT pk_posts PRIMARY KEY(id),
CONSTRAINT fk_post_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS comments(
id           int(255)     not null auto_increment,
user_id      int(255)     not null,
post_id      int(255)     not null,
content      text         not null,
created_at   datetime,
updated_at   datetime,
CONSTRAINT pk_posts PRIMARY KEY(id),
CONSTRAINT fk_comment_user FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_comment_post FOREIGN KEY(post_id) REFERENCES posts(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS likes(
id           int(255)     not null auto_increment,
user_id      int(255) not null,
post_id      int(255) not null,
created_at   datetime,
updated_at   datetime,
CONSTRAINT pk_posts PRIMARY KEY(id),
CONSTRAINT fk_like_user FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_like_post FOREIGN KEY(post_id) REFERENCES posts(id)
)ENGINE=InnoDb;




