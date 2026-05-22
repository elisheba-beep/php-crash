-- Unnormalized structure (not in 1NF)
CREATE TABLE Purchases (
    CustomerID INT,
    CustomerName VARCHAR(100),
    PurchasedProducts VARCHAR(255) -- Comma-separated values
);

-- Normalized 1NF structure
CREATE TABLE CustomerProducts (
    CustomerID INT,
    CustomerName VARCHAR(100),
    Product VARCHAR(100)
);

-- Sample data for CustomerProducts table (1NF)
INSERT INTO CustomerProducts (CustomerID, CustomerName, Product) VALUES
(101, 'John Doe', 'Laptop'),
(101, 'John Doe', 'Mouse'),
(102, 'Jane Smith', 'Tablet'),
(103, 'Alice Brown', 'Keyboard'),
(103, 'Alice Brown', 'Monitor'),
(103, 'Alice Brown', 'Pen');