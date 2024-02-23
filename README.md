# SaasFuelDelivery
Software as a Service (SaaS) model Fuel Delivery 

Our project is built on a Software as a Service (SaaS) model, employing a multi-tenancy database architecture where each company operates within its own isolated database environment. Leveraging the Laravel Spatie Multi-Tenancy package, we ensure efficient and secure segregation of data between tenants while providing a seamless user experience.

To streamline database population, we've implemented custom Artisan commands, allowing us to seed tenant databases with necessary data using specified seeders. This ensures that each tenant's database is initialized with the required information upon setup.

Upon authentication, incoming requests are carefully routed to the appropriate tenant's environment based on the user's affiliation. This ensures that users are directed to their respective tenant's home pages, facilitating a personalized experience tailored to each company's needs.

Furthermore, our system implements a robust security model by utilizing middleware and role-based permissions. Each CRUD operation, including those for orders, trucks, and companies, is governed by specific middleware and permission rules. This granular control ensures that users only access and manipulate data within their authorized scope, maintaining data integrity and security across the platform.

Overall, our project provides a scalable and secure solution for multi-tenant applications, empowering businesses to efficiently manage their operations within a shared infrastructure while preserving data isolation and security.
