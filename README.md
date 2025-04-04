# place25
Copy from r/place, reddit's pixel art community board.

I enjoyed participating so much that I wanted to understand it better and ended up making a similar one, very simple and summarized. But I found it really fun to create this.

# Create table
CREATE DATABASE pixelart;
USE pixelart;

CREATE TABLE pixels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    posicao INT NOT NULL,
    cor VARCHAR(7) NOT NULL
);

