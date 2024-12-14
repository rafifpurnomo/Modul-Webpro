const express = require('express');
const router = express.Router();
const moviesControllers = require('../controllers/movies.controller');

router.get('/getAllMovies', moviesControllers.getAllDataMovies);
router.post('/addMovies', moviesControllers.addMovies);
router.delete('/deleteMovies/:id_movies', moviesControllers.deleteMovies);
router.patch('/updateMovies/:id_movies', moviesControllers.updateDeskripsi);

module.exports = router;