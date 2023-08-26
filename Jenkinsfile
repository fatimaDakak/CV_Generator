pipeline {
  agent any
  stages {
    stage('Checkout code') {
      steps {
        git(url: 'https://github.com/fatimaDakak/CV_Generator', branch: 'main')
      }
    }

    stage('Log') {
      steps {
        sh 'ls -la'
      }
    }

    stage('build') {
      steps {
        sh '''
docker build -t Dockerfile .
'''
      }
    }

  }
}