const conn = require('../config/db_config');

const getAllDataMovies = () => {
    const QUERY = "SELECT * FROM movies";
    return conn.execute(QUERY);
};

const addMovies = (nama, tahun_rilis, deskripsi) => {
    const QUERY = "INSERT INTO movies (nama, tahun_rilis, deskripsi) VALUES (?,?,?)"
    return conn.execute(QUERY, [nama, tahun_rilis, deskripsi]);
}

const deleteMovies = (id_movies) => {
    const QUERY = "DELETE FROM movies WHERE id_movies = ?"
    return conn.execute(QUERY, [id_movies]);
}

const editMovies = (deskripsi, id_movies) => {
    const QUERY =  "UPDATE movies SET deskripsi = ? WHERE id_movies = ?";;
    return conn.execute(QUERY, [deskripsi, id_movies]);
}

module.exports = {
    getAllDataMovies,
    addMovies,
    deleteMovies,
    editMovies
}