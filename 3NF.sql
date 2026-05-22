-- Sample data for Products and Suppliers (3NF)
INSERT INTO Suppliers (SupplierID, SupplierName) VALUES
(401, 'HP'),
(402, 'Logitech'),
(403, 'Apple');

INSERT INTO Products (ProductID, ProductName, SupplierID) VALUES
(301, 'Laptop', 401),
(302, 'Mouse', 402),
(303, 'Tablet', 403);

INSERT INTO Orders (OrderID, CustomerID, ProductID) VALUES
(201, 101, 301),
(202, 101, 302),
(203, 102, 303);