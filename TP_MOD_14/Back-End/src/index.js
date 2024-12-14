const PORT = 4000;
const express = require("express");
const cors = require("cors");
const app = express();
const moviesRouter = require('./routes/movies.routes');

app.use(cors());
app.use(express.json());

app.use('/movies', moviesRouter);
app.listen(PORT, () => {
    console.log(`listening at http://localhost:${PORT}`);
  });