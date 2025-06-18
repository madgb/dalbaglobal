class UploadAdapter {
	constructor(loader) {
			this.loader = loader;
	}

	upload() {
		return this.loader.file.then(file => new Promise(((resolve, reject) => {
				
				const maxFileSize = 10 * 1024 * 1024; // 10MB
				if (file.size > maxFileSize) {
					return reject("파일 용량이 10MB를 초과하여 업로드할 수 없습니다.");
				}

				this._initRequest();
				this._initListeners( resolve, reject, file );
				this._sendRequest( file );
		})))
	}

	_initRequest() {
			const xhr = this.xhr = new XMLHttpRequest();
			xhr.open('POST', '/master/_controller/imgUploadProc.php', true);
			xhr.responseType = 'json';
	}

	_initListeners(resolve, reject, file) {
			const xhr = this.xhr;
			const loader = this.loader;
			const genericErrorText = '파일을 업로드 할 수 없습니다.'

			xhr.addEventListener('error', () => {reject(genericErrorText)})
			xhr.addEventListener('abort', () => reject())
			xhr.addEventListener('load', () => {
					const response = xhr.response
					if(!response || response.error) {
							return reject( response && response.error ? response.error.message : genericErrorText );
					}
					resolve({
							default: response.url //업로드된 파일 주소
					})
			})
	}

	_sendRequest(file) {
			const data = new FormData()
			data.append('upload',file)

			this.xhr.send(data)
	}
}