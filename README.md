# Introduction
In this project, we have built an application supported by a remote database that facilitates public access to market activity of U.S. politicians for public surveillance and deter political corruption.
The database, built with PostgreSQL, stores information of currently active U.S. politicians and related stock transactions, detailing the range of principal amount, date and time of occurrence, and its type. It also stores auxiliary information of each politician, such as the bills they have voted on, basic information of their family members, state represented etc. for referencing convenience.
The interface is built with PHP that executes SQL queries to the database and displays a list of matching entries in the corresponding table.
