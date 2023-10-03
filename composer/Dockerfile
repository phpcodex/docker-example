# Download Composer
FROM composer:latest
RUN apk update; \
    apk upgrade;

# Install Git.
RUN apk add git

# Make ssh dir
RUN mkdir /root/.ssh/

# Copy over private key, and set permissions
ADD ssh/id_rsa /root/.ssh/id_rsa
RUN chmod 600 /root/.ssh/id_rsa
RUN chown -R root:root /root/.ssh

# Create known_hosts
RUN touch /root/.ssh/known_hosts

# Add bitbuckets key
RUN ssh-keyscan bitbucket.org >> /root/.ssh/known_hosts

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Clone the code
# RUN git clone https://github.com/vlucas/phpdotenv.git /var/www/html/dotenv