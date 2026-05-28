CREATE TABLE IF NOT EXISTS messages (
    id SERIAL PRIMARY KEY,
    content VARCHAR(255) NOT NULL
);

INSERT INTO messages (content) VALUES ('Привет! Это данные из PostgreSQL.');