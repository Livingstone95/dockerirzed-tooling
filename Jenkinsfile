 pipeline {

    agent {dockerfile true}

    enviroment {
        registry = "livingstone03/tooling" 
        registryCredential = 'dockerhub-login' 
        dockerImage = ''
    }

    stages {

        stage ('initial cleanup') {
          steps {
                dir("${WORKSPACE}") {
               deleteDir()
              }
            }
        }

        stage('Checkout SCM') {
          steps {
            git branch: 'feature', url: 'https://github.com/Livingstone95/Todo-app.git', credentialsId: 'github-login'
          }
       }

       stage('Build Docker Image') {
         steps {
           script {
              dockerImage = docker.build tooling
                  }
           } 
       }
       
        // stage('Run the container')

        // stage('Test the Image before pusging to registry')
        //   steps{
        //     sh './imagetest'
        //   }

        stage('Tag the image')
          steps {
              sh 'docker image tag tooling:0.0.1 livingstone03/tooling:feature-0.0.1'
          }

        stage('Deploy docker image to docker hub') {
          steps {
            script {
            docker.withRegistry( '', registryCredential ) {
            dockerImage.push('livingstone03/tooling:feature-0.0.1')
               }
            }

           }
        }

        stage('Remove unsused images')
          steps{
            sh "docker rmi $registry:$BUILD_NUMBER"
          }

      }

}
