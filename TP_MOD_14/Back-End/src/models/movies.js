const conn = require('../config/db_config');

const getAllDataMovies = () => {
    const QUERY = "SELECT * FROM movies";
    return conn.execute(QUERY);
};

const getAllMoviesByID = (id_movies) => {
    const QUERY = "SELECT * FROM movies WHERE id_movies = ?";
    return conn.execute(QUERY, [id_movies]);
};

const addMovies = (nama, tahun_rilis, deskripsi) => {
    const QUERY = "INSERT INTO movies (nama, tahun_rilis, deskripsi) VALUES (?,?,?)"
    return conn.execute(QUERY, [nama, tahun_rilis, deskripsi]);
}

const deleteMovies = (id_movies) => {
    const QUERY = "DELETE FROM movies WHERE id_movies = ?"
    return conn.execute(QUERY, [id_movies]);
}

const editMovies = (nama, tahun_rilis, deskripsi, id_movies) => {
    const QUERY =  "UPDATE movies SET nama = ?, tahun_rilis = ? ,deskripsi = ? WHERE id_movies = ?";;
    return conn.execute(QUERY, [nama, tahun_rilis, deskripsi,  id_movies]);
}

module.exports = {
    getAllDataMovies,
    getAllMoviesByID,
    addMovies,
    deleteMovies,
    editMovies
}