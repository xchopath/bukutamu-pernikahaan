sudo docker-compose up -d
sudo docker-compose exec mysqldb mysql -u root -pabcd1234XYZ wedding -e 'CREATE TABLE guests (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL, email VARCHAR(100), message TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)'