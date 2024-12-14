const movieModels = require("../models/movies");

const getAllDataMovies = async (req, res) => {
  try {
    const [data] = await movieModels.getAllDataMovies();
    if (data.length > 0) {
      res.json({
        massage: "menampilkan data movies",
        data: data,
      });
    } else {
      res.json({
        massage: "data movies tidak ada",
        data: data,
      });
    }
  } catch (error) {
    res.status(500).json({
      massage: "error",
      serverMassage: error,
    });
  }
};

const getAllMoviesByID = async (req, res) => {
  const { id_movies } = req.params;

  try {
    const [data] = await movieModels.getAllMoviesByID(id_movies);
    if (data.length > 0) {
      res.json({
        massage: "menampilkan data movies",
        data: data,
      });
    } else {
      res.status(404).json({
        massage: "movie tidak ada",
      });
    }
  } catch (error) {
    res.status(500).json({
      massage: "error",
      serverMassage: error,
    });
  }
};

const addMovies = async (req, res) => {
  const { nama, tahun_rilis, deskripsi } = req.body;

  try {
    await movieModels.addMovies(nama, tahun_rilis, deskripsi);
    const RS = {
      nama,
      tahun_rilis,
      deskripsi,
    };
    res.json({
      massage: "Berhasil menambahkan movies",
      data: RS,
    });
  } catch (error) {
    res.status(500).json({
      massage: "error",
      serverMassage: error,
    });
  }
};

const deleteMovies = async (req, res) => {
  const { id_movies } = req.params;

  try {
    await movieModels.deleteMovies(id_movies);
    res.json({
      massage: "Berhasil menghapus movies",
    });
  } catch (error) {
    res.status(500).json({
      massage: "error",
      serverMassage: error,
    });
  }
};

const updateDeskripsi = async (req, res) => {
  const { nama, tahun_rilis, deskripsi } = req.body;
  const { id_movies } = req.params;

  try {
    await movieModels.editMovies(nama, tahun_rilis, deskripsi, id_movies);
    const RS = {
      id_movies,
      nama,
      tahun_rilis,
      deskripsi,
    };
    res.json({
      massage: "Berhasil mengedit deskripsi movies",
      data: RS,
    });
  } catch (error) {
    res.status(500).json({
      massage: "error",
      serverMassage: error,
    });
  }
};

module.exports = {
  getAllDataMovies,
  getAllMoviesByID,
  addMovies,
  deleteMovies,
  updateDeskripsi,
};
