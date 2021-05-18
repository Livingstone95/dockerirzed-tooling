 pipeline {
 
    environment {
        Imagename = "livingstone03/tooling" 
        registryCredential = 'dockerhub-login' 
        dockerImage = ''
    }

    agent any

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
            git branch: 'feature', url: 'https://github.com/Livingstone95/dockerirzed-tooling.git', credentialsId: 'github-login'
          }
       }

      // stage('remove existing image if there is any'){
      //   steps{
      //      sh 'docker rmi registry'
      //   }    
      // }
// write a command to ignore if the image does not exits, the stage should igonre the error and continue

       stage('Build Docker Image') {
         steps {
           script {
              dockerImage = docker.build Imagename
                  }
           } 
       }

        // stage('Run the container'){
        //   steps{
        //     sh 'docker run ${Imagename}'
        //   }
        // }

        // stage('Test the Image before pusging to registry')
        //   steps{
        //     sh './imagetest'
        //   }

        stage('Tag the image'){
           steps {
              sh 'docker image tag ${Imagename}:latest ${Imagename}:feature-0.0.1'
          }
        }
         
        stage('Deploy docker image to docker hub') {
          steps {
            script {
            docker.withRegistry( '', registryCredential ) {
            dockerImage.push('feature-0.0.1')
               }
            }

           }
        }

        stage('Remove images'){
           steps{
            sh "docker rmi $Imagename:latest"
            sh "docker rmi $Imagename:feature-0.0.1"
          }
        }

      }

}
