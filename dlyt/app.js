const express = require('express');
const cors = require('cors');
const ytdl = require('ytdl-core');
const app = express();
app.use(cors());
app.listen(4000, () => {
    console.log('Server Works !!! At port 4000');
});
app.get('/download', (req, res) => {
    var URL = req.query.URL;
    //var rrr=req.query.rrr;
    res.header('Content-Disposition', 'attachment; filename="downloaded.mp3"');
    ytdl(URL, {
        format: 'mp3',
        itag: 135,
    }).pipe(res);
});

app.get('/download360p', (req, res) => {
    var URL = req.query.URL;
    //var rrr=req.query.rrr;
    res.header('Content-Disposition', 'attachment; filename="downloaded.mp4"');
    ytdl(URL, {
        format: 'mp4',
        itag: 18,
    }).pipe(res);
});

app.get('/download480p', (req, res) => {
    var URL = req.query.URL;
    //var rrr=req.query.rrr;
    res.header('Content-Disposition', 'attachment; filename="downloaded.mp4"');
    ytdl(URL, {
        format: 'mp4',
        itag: 135,
    }).pipe(res);
});

