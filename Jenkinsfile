pipeline {
  agent any
  stages {
    stage('Checkout code') {
      steps {
        git(url: 'https://github.com/fatimaDakak/CV_Generator', branch: 'main')
      }
    }

    stage('Log') {
      parallel {
        stage('Log') {
          steps {
            sh 'ls -la'
          }
        }

        stage('Front-end unit test') {
          steps {
            sh 'cd style.css && npm i && npm run test:unit'
          }
        }

      }
    }

  }
}