-- Orders table after 2NF
CREATE TABLE Orders (
    OrderID INT PRIMARY KEY,
    CustomerID INT,
    Product VARCHAR(100)
);

-- Customers table after 2NF
CREATE TABLE Customers (
    CustomerID INT PRIMARY KEY,
    CustomerName VARCHAR(100)
);

-- Example foreign key constraint
ALTER TABLE Orders
ADD FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID);

-- Sample data for Customers and Orders (2NF)
INSERT INTO Customers (CustomerID, CustomerName) VALUES
(101, 'John Doe'),
(102, 'Jane Smith');

INSERT INTO Orders (OrderID, CustomerID, Product) VALUES
(201, 101, 'Laptop'),
(202, 101, 'Mouse'),
(203, 102, 'Tablet');