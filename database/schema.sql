-- Table structure for `User table`

CREATE TABLE users(

    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    role VARCHAR(50)

);

-- Table structure for `chef_profiles table`

CREATE TABLE chef_profiles(

    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    display_name VARCHAR(100),
    specialization VARCHAR(100),
    bio TEXT,
    years_experience INT,
    website VARCHAR(200),
    instagram VARCHAR(100),
    youtube VARCHAR(100)

);

-- Table structure for `recipes table`

CREATE TABLE recipes(

    id INT PRIMARY KEY AUTO_INCREMENT,
    chef_id INT,
    title VARCHAR(200),
    description TEXT,
    cuisine VARCHAR(100),
    diet_type VARCHAR(100),
    difficulty VARCHAR(50),
    prep_time INT,
    cook_time INT,
    servings INT,
    calories INT,
    status VARCHAR(50),
    views INT

);

-- Table structure for `ingredients`

CREATE TABLE ingredients(

    id INT PRIMARY KEY AUTO_INCREMENT,
    recipe_id INT,
    ingredient_name VARCHAR(200)

);
-- Table structure for `steps table`
CREATE TABLE steps(

    id INT PRIMARY KEY AUTO_INCREMENT,
    recipe_id INT,
    step_description TEXT

);
-- Table structure for `collections table`
CREATE TABLE collections(

    id INT PRIMARY KEY AUTO_INCREMENT,
    chef_id INT,
    collection_name VARCHAR(200),
    description TEXT,
    status VARCHAR(50)

);

-- Table structure for `collections_recipes table`
CREATE TABLE collection_recipes(

    id INT PRIMARY KEY AUTO_INCREMENT,
    collection_id INT,
    recipe_id INT

);
-- Table structure for `reviews table`
CREATE TABLE reviews(

    id INT PRIMARY KEY AUTO_INCREMENT,
    recipe_id INT,
    user_name VARCHAR(100),
    rating INT,
    review TEXT,
    chef_reply TEXT

);

-- Table structure for `verification_request table`
CREATE TABLE verification_requests(

    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    motivation TEXT,
    credentials TEXT,
    portfolio VARCHAR(200),
    status VARCHAR(50)

);



