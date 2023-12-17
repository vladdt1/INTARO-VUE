const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

app.use(bodyParser.json());

// MongoDB connection
mongoose.connect('mongodb://localhost:27017/resumeDB', { useNewUrlParser: true, useUnifiedTopology: true });
const db = mongoose.connection;

// Define MongoDB schema
const resumeSchema = new mongoose.Schema({
  profession: String,
  city: String,
  image: String,
  fullName: String,
  birthDate: Date,
  education: String,
  phoneNumber: String,
  email: String,
  salary: String,
  skills: String,
  about: String,
  status: String,
  educationDetails: {
    institution: String,
    faculty: String,
    specialization: String,
    graduationYear: String,
  },
});

// Define MongoDB model
const Resume = mongoose.model('Resume', resumeSchema);

// REST API endpoints
app.get('/api/resume', async (req, res) => {
  try {
    const resumes = await Resume.find();
    res.json(resumes);
  } catch (error) {
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.get('/api/resume/:id', async (req, res) => {
  const id = req.params.id;
  try {
    const resume = await Resume.findById(id);
    if (!resume) {
      return res.status(404).json({ error: 'Resume not found' });
    }
    res.json(resume);
  } catch (error) {
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.post('/api/resume/add', async (req, res) => {
  const resumeData = req.body;

  try {
    const newResume = new Resume(resumeData);
    const savedResume = await newResume.save();

    res.json(savedResume);
  } catch (error) {
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.post('/api/resume/:id/edit', async (req, res) => {
  const id = req.params.id;
  const updatedResumeData = req.body;

  try {
    const updatedResume = await Resume.findByIdAndUpdate(id, updatedResumeData, { new: true });
    if (!updatedResume) {
      return res.status(404).json({ error: 'Resume not found' });
    }

    res.json(updatedResume);
  } catch (error) {
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.post('/api/resume/:id/status/update', async (req, res) => {
  const id = req.params.id;
  const newStatus = req.body.status;

  try {
    const updatedResume = await Resume.findByIdAndUpdate(id, { status: newStatus }, { new: true });
    if (!updatedResume) {
      return res.status(404).json({ error: 'Resume not found' });
    }

    res.json(updatedResume);
  } catch (error) {
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
