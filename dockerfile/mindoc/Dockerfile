FROM debian:11.5-slim
LABEL MAINTAINER="hoopan108@gmail.com"
ENV TZ "Asia/Shanghai"

# 时区
RUN echo ${TZ} >/etc/timezone

WORKDIR /data/mindoc

COPY mindoc ./

RUN chmod +x ./mindoc_linux_amd64

EXPOSE 8181

ENTRYPOINT ["./mindoc_linux_amd64"]
