CREATE DATABASE exam_db;

-- Use the created database
USE exam_db;

-- Create the questions table
CREATE TABLE questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    question_text VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the options table
CREATE TABLE options (
    option_id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    option_text VARCHAR(100) NOT NULL,
    is_correct BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (question_id) REFERENCES questions(question_id) ON DELETE CASCADE
);

-- Insert sample data into questions
INSERT INTO questions (question_text) VALUES
('What is the capital of France?'),
('Which planet is known as the Red Planet?'),
('What is the largest mammal in the world?');

-- Insert sample data into options
INSERT INTO options (question_id, option_text, is_correct) VALUES
(1, 'Berlin', FALSE),
(1, 'Madrid', FALSE),
(1, 'Paris', TRUE),
(1, 'Rome', FALSE),
(2, 'Earth', FALSE),
(2, 'Mars', TRUE),
(2, 'Jupiter', FALSE),
(2, 'Venus', FALSE),
(3, 'Elephant', FALSE),
(3, 'Blue Whale', TRUE),
(3, 'Giraffe', FALSE),
(3, 'Great White Shark', FALSE);