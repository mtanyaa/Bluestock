const express = require("express");
const dotenv = require("dotenv");
const cors = require("cors");
const sequelize = require("./src/config/db");
const userRoutes = require("./src/routes/userRoutes");

dotenv.config();
const app = express();

app.use(express.json());
app.use(cors());

app.use("/api/users", userRoutes);

sequelize.sync().then(() => console.log("Database Connected!"));

const PORT = process.env.PORT || 5000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
